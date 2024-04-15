install:
	ampy --port /dev/ttyACM0 put main.py
	ampy --port /dev/ttyACM0 put config.py

run:
	make install
	ampy --port /dev/ttyACM0 run -n main.py
	ampy --port /dev/ttyACM0 run -n config.py
