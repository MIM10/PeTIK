import os
os.system('cls')

status = " "
def usrname():
    print()
    inputan = input("Masukkan Username : ")
    cek1 = len(inputan)
    cek2 = ' ' in inputan
    cek3 = inputan.capitalize()

    if cek1 > 9 and cek2 == False and cek3 == inputan:
        status = "Berhasil"
        return inputan, status

    else:
        inputan = "Username tidak valid"
        status = "Gagal"
        return inputan, status


def email():
    inputan = input("Masukkan Email : ")
    cek1 = len(inputan)
    cek2 = ' ' in inputan
    cek3 = '@' and '.' in inputan

    if cek1 > 7 and cek2 == False and cek3 == True:
        status = "Berhasil"
        return inputan, status

    else:
        inputan = "Email tidak valid"
        status = "Gagal"
        return inputan, status


def no_hp():
    inputan = str(input("Masukkan No Telefon : "))
    cek1 = len(inputan)
    cek2 = ' ' in inputan
    cek3 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@$%&().,?~`!@#$%^&*_+=-:'?><]{\[}"

    if cek1 > 11 and cek2 == False and cek3 not in inputan:
        status = "Berhasil"
        return inputan, status

    else:
        inputan = "Nomor tidak valid"
        status = "Gagal"
        return inputan, status


def main():
    while True:
        u1, u2 = usrname()

        print("\nUsername = ", u1)
        print("Status   = ", u2)
        print("=" * 30)
        if u2 == "Berhasil":
            break

    while True:
        e1, e2 = email()
        print("\nEmail  = ", e1)
        print("Status = ", e2)
        print("=" * 30)
        if e2 == "Berhasil":
            break

    while True:
        a1, a2 = no_hp()
        print("\nNo Telepon = ", a1)
        print("Status     = ", a2)
        print("=" * 30)
        if a2 == "Berhasil":
            break

main()
