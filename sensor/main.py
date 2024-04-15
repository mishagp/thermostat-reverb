from machine import ADC
from machine import Pin
import time
import math
import network
import urequests
import json
import config

nic = network.WLAN(network.STA_IF)
if not nic.isconnected():
    print('connecting to wifi...')
    nic.active(True)
    nic.connect(config.WIFI_SSID, config.WIFI_PASSWD);
    while not nic.isconnected():
        pass
print('connected to wifi!')

pin = Pin(26, Pin.IN)
adc = ADC(pin)

# https://www.halvorsen.blog/documents/technology/iot/pico/pico_thermisor.php
def thermistorTemp(Vout):
    # Voltage Divider
    Vin = 3.3
    Ro = 10000  # 10k Resistor

    # Steinhart Constants
    A = 0.001129148
    B = 0.000234125
    C = 0.0000000876741

    # Calculate Resistance
    Rt = (Vout * Ro) / (Vin - Vout)

    # Steinhart - Hart Equation
    TempK = 1 / (A + (B * math.log(Rt)) + C * math.pow(math.log(Rt), 3))

    # Convert from Kelvin to Celsius
    TempC = TempK - 273.15

    return TempC

while True:
    # read a raw analog value in the range 0-65535
    raw = adc.read_u16()
    vout = (3.3/65535) * raw
    tempCelcius = thermistorTemp(vout)

    payload = {
        "dataPoint": tempCelcius
    }
    headers = {
        "Content-Type": "application/json"
    }
    r = urequests.post(
        config.APP_DOMAIN + "/data-points",
        data=json.dumps(payload),
        headers=headers
    )
    r.close()

    print(round(tempCelcius, 1))
    time.sleep_ms(500)
