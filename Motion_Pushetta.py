import urllib2
import json
import RPi.GPIO as GPIO
import time
from gpiozero import MotionSensor

def sendNotification(token, channel, message):
	data = {
		"body" : message,
		"message_type" : "text/plain"
	}

	req = urllib2.Request('http://api.pushetta.com/api/pushes/{0}/'.format(channel))
	req.add_header('Content-Type', 'application/json')
	req.add_header('Authorization', 'Token {0}'.format(token))

	response = urllib2.urlopen(req, json.dumps(data))


GPIO.setmode(GPIO.BCM)

# In BCM mode pin 7 is identified by id 4
PIR_PIN = 21
GPIO.setup(PIR_PIN, GPIO.IN)

try:
        print "Reading PIR status"

        while True:
                if GPIO.input(PIR_PIN):
                	sendNotification("4b6e163b7935271b924dbf2fdc7b4b528bd6c6db", "Sample Channel", "Motion detected")
                        print "Motion detected!"

except KeyboardInterrupt:
        print "Exit"
        GPIO.cleanup()