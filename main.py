import pywifi
import time

def connect_to_wifi(ssid, password):
    wifi = pywifi.PyWiFi()
    iface = wifi.interfaces()[0]

    iface.disconnect()  # يتم قطع الاتصال من أي شبكة واي فاي قائمة

    time.sleep(1)

    profile = pywifi.Profile()
    profile.ssid = ssid
    profile.auth = pywifi.const.AUTH_ALG_OPEN
    profile.akm.append(pywifi.const.AKM_TYPE_WPA2PSK)
    profile.cipher = pywifi.const.CIPHER_TYPE_CCMP
    profile.key = password

    iface.remove_all_network_profiles()
    tmp_profile = iface.add_network_profile(profile)

    iface.connect(tmp_profile)

    # انتظر لمدة 10 ثواني للتحقق من الاتصال
    for i in range(10):
        if iface.status() == pywifi.const.IFACE_CONNECTED:
            print("Succses!")
            break
        time.sleep(1)
    else:
        print("Dont Connect")

# واجهة المستخدم
def user_interface():
    print("Hello In Script!")
    print("Develop By Ziad Sameh")
    ssid = input("Write A Name(SSID): ")
    password = input("Write A Password: ")

    connect_to_wifi(ssid, password)

if __name__ == "__main__":
    user_interface()
