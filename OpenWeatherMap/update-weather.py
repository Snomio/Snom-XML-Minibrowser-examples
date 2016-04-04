#!/usr/bin/python

import pyowm
import optparse
import sys

def error(message):
    print "ERROR: %s" % message
    sys.exit(-1)

def render_city(owm, app_url, city_list, index):
    city = city_list[index]
    today = owm.weather_at_place(city)
    today_w = today.get_weather()

    today_t = today_w.get_temperature(unit='celsius')

    today_tmax = today_t['temp_max']
    today_tmin = today_t['temp_min']
    today_temp = today_t['temp']
    today_status = today_w.get_detailed_status() 
    today_icon = today_w.get_weather_icon_name()
    today_date = pyowm.utils.timeformatutils.to_date(today_w.get_reference_time()).strftime("%A %d. %B %Y")
    today_url='%s#sub=*[@id="details_%s"]&var:title=%s %s&var:tmax=%s&var:tmin=%s&var:temp=%s&var:status=%s&var:icon=%s' %\
	(app_url, city, city, today_date, today_tmax, today_tmin, today_temp, today_status, today_icon)

    fc = owm.daily_forecast(city, limit=6)
    f = fc.get_forecast()

    menu = ""
    for w in f:
        fc_t = w.get_temperature(unit='celsius')
        fc_tmin = fc_t['min']
        fc_tmax = fc_t['max']
        fc_temp = fc_t['day']
        fc_status = w.get_detailed_status()
        #fc_sunrise = w.get_sunrise_time(timeformat="iso")
        #fc_sunset = w.get_sunset_time(timeformat="iso")
        fc_icon = w.get_weather_icon_name()
        date = pyowm.utils.timeformatutils.to_date(w.get_reference_time()).strftime("%A %d. %B %Y")
        title = "%s %s" % (city, date)
        fc_url = '%s#sub=*[@id="details_%s"]&var:title=%s&var:tmax=%s&var:tmin=%s&var:temp=%s&var:status=%s&var:icon=%s' %\
        	(app_url, city, title, fc_tmax, fc_tmin, fc_temp, fc_status, fc_icon) 
   
        date = pyowm.utils.timeformatutils.to_date(w.get_reference_time()).strftime("%A %d. %B %Y")
        menu = menu + "|%s|%s|%s" % (date, w.get_weather_icon_name(), fc_url)

    menu = menu + "|"

    previous_city = city_list[(index - 1) % len(city_list)] 
    next_city = city_list[(index + 1) % len(city_list)] 

    print ' <SnomIPPhoneMenu id="city_%s">' % city
    print '  <Title>Weather - %s</Title>' % city
    print '   <MenuItem name="Today">'
    print '     <Url>%s</Url>' % today_url
    print '     <Image>http://openweathermap.org/img/w/%s.png</Image>' % today_icon
    print '   </MenuItem>'
    print '   <Repeat token="|__NAME__|__ICON__|__URL__|" values="%s">' % menu
    print '     <MenuItem name="__NAME__">'
    print '       <Url>__URL__</Url>'
    print '       <Image>http://openweathermap.org/img/w/__ICON__.png</Image>'
    print '     </MenuItem>'
    print '   </Repeat>'
    print '   <SoftKeyItem>'
    print '     <Name>F1</Name>'
    print '     <Label>%s</Label>' % previous_city
    print '     <Url>%s#sub=*[@id="city_%s"]</Url>' % (app_url, previous_city)
    print '   </SoftKeyItem>'
    print '   <SoftKeyItem>'
    print '     <Name>F2</Name>'
    print '     <Label>%s</Label>' % next_city
    print '     <Url>%s#sub=*[@id="city_%s"]</Url>' % (app_url, next_city)
    print '   </SoftKeyItem>'
    print " </SnomIPPhoneMenu>"

    print ' <SnomIPPhoneText track="no" id="details_%s"> <!-- details -->' % city
    print '  <Title>$(var:title)</Title>'
    print '  <LocationX>50</LocationX>'
    print '  <LocationY>25</LocationY>'
    print """  <Text>
   $(var:status)<br/>
   Temp max: $(var:tmax)<br/>
   Temp min: $(var:tmin)<br/>
   Temp: $(var:temp)<br/>
  </Text>"""
    print '<Image>'
    print '<LocationX>2</LocationX>'
    print '  <LocationY>23</LocationY>'
    print '<Url>http://openweathermap.org/img/w/$(var:icon).png</Url></Image>'
    print '   <SoftKeyItem>'
    print '     <Name>F1</Name>'
    print '     <Label>%s</Label>' % previous_city
    print '     <Url>%s#sub=*[@id="city_%s"]</Url>' % (app_url, previous_city)
    print '   </SoftKeyItem>'
    print '   <SoftKeyItem>'
    print '     <Name>F2</Name>'
    print '     <Label>%s</Label>' % next_city
    print '     <Url>%s#sub=*[@id="city_%s"]</Url>' % (app_url, next_city)
    print '   </SoftKeyItem>'

    print " </SnomIPPhoneText> <!-- details -->"

def render_main(app_url, api_key, city_list, api_type='free'):
    owm = pyowm.OWM(subscription_type=api_type, API_key=api_key)
    print '<?xml version="1.0" encoding="UTF-8"?>'
    print "<SnomIPPhoneBatch>"

    index = 0
    for city in city_list:
        render_city(owm, app_url, city_list, index)
        index = index + 1

    print "</SnomIPPhoneBatch>"

if __name__ == '__main__':
    usage = """%prog [OPTIONS]"""
    opt = optparse.OptionParser(usage=usage)
    opt.add_option('-u', dest='app_url', type='string', default=None, action='store',
        help='Set the application URL')
    opt.add_option('-c', dest='city', type='string', default=[], action='append',
            help='Set the city to retrieve, you can add more the one -c <city>')
    opt.add_option('-k', dest='api_key', type='string', default=None, action='store',
        help='The OpenWeatherMap.org API Key')
    opt.add_option('-p', dest='api_pro', default=False, action='store_true',
            help='Your API key belongs to a pro account')
    
    options, args = opt.parse_args(sys.argv[1:])

    if options.app_url == None:
        error("Application URL (-u) not defined.")
    if options.api_key == None:
        error("API KEY (-k) not defined")
    if len(options.city) == 0:
        options.city = ["Berlin"]
    if options.api_pro:
        api_type = 'pro'
    else:
        api_type = 'free'

    render_main(options.app_url, options.api_key, options.city, api_type)
