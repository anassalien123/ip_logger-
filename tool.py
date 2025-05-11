import subprocess
import time

def local_server():
    print('local server started ........')
    subprocess.Popen(["php","-S","127.0.0.1:8080"],stdout=subprocess.DEVNULL)
    time.sleep(2)

def cf_server():
    print('local server started ........')
    subprocess.Popen(["php","-S","127.0.0.1:8080"],stdout=subprocess.DEVNULL)
    time.sleep(2)

    print('CloudFlare Tunnel started ...')
    subprocess.Popen(["cf.exe","tunnel","-url","127.0.0.1:8080"],stdout=subprocess.DEVNULL)
    time.sleep(10)

def starts():
    print ("Kali Tools 2025")
    choice = input("use cloudFlare Tunnel? (Y/N) [Default : Y] :").strip().lower()
    if choice in ["n","no"]:
        local_server()
    else:
        cf_server()

if __name__ == "__main__":
    starts()
    while True:
        time.sleep(1)