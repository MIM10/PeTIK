import os
import random, string
os.system('cls')


print("***** SELAMAT DATANG DI ADZNA BANK *****")

def menu():
    menu = """
    MENU :
    [1] Buka rekening
    [2] Setoran tunai
    [3] Tarik tunai
    [4] Transfer
    [5] Lihat daftar transfer
    [6] Keluar
    """
    print(menu)

    while True:
        try:
            pilih_menu = int(input("Masukkan menu pilihan Anda : "))
            slh = 0,7,8,9

            if pilih_menu == 1 or pilih_menu == slh == False:
                buka_rekening()

            elif pilih_menu == 2 or pilih_menu == slh == False:
                setor_tunai()

            elif pilih_menu == 3 or pilih_menu == slh == False:
                tarik_tunai()

            elif pilih_menu == 4 or pilih_menu == slh == False:
                tf()

            elif pilih_menu == 5 or pilih_menu == slh == False:
                daftar_tf()

            elif pilih_menu == 6 or pilih_menu == slh == False:
                print("Terima kasih atas kunjungan Anda...")
                exit()
            else:
                print("Pilihan Anda salah, Ulangi.")

        except ValueError:
            print("Pilihan Anda salah, Ulangi.")


def buka_rekening():
    norek = "REK" + ''.join(random.choice(string.digits) for _ in range(3))
    print("\n*** BUKA REKENING ***")
    nama_user = input("Masukkan Nama : ")
    awal_setor = int(input("Masukkan setoran awal : "))
    print("Pembukaan rekening dengan nomor",norek,"atas nama",nama_user,"berhasil.\n")
    hasil = norek,nama_user,awal_setor

    bank = open("Tugas Adzna Bank/Adzna.txt", "a")
    bank.write(f"{norek},{nama_user},{awal_setor}\n")
    bank.close()

    mainlagi()


def setor_tunai():
    print("\n*** SETORAN TUNAI ***")
    rek = input("Masukkan nomor rekening : ")
    nominal = input("Masukkan nominal yang akan disetor : ")

    m1 = open("Tugas Adzna Bank/Adzna.txt", "r+")
    m2 = open("Tugas Adzna Bank/Adzna.txt", "r+")
    for line in m1:
        if rek in line.lower():
            line = line.strip().split(",")
            line[2] = str(int(line[2]) + int(nominal))
            line = ",".join(line)
            m2.write(f"{line}\n")
            print("Setoran tunai sebesar",nominal,"ke rekening",rek.upper(),"berhasil\n")
            break
    else:
        print("Nomor rekening tidak terdaftar. Setoran tunai Gagal.")

    m1.close()
    m2.close()
    mainlagi()


def tarik_tunai():
    print("\n*** TARIK TUNAI ***")
    rek = input("Masukkan nomor rekening : ")
    nominal = input("Masukkan nominal yang akan ditarik : ")

    m1 = open("Tugas Adzna Bank/Adzna.txt", "r+")
    m2 = open("Tugas Adzna Bank/Adzna.txt", "r+")
    for line in m1:
        if rek in line.lower():
            line = line.strip().split(",")
            line[2] = str(int(line[2]) - int(nominal))
            line = ",".join(line)
            m2.write(f"{line}\n")
            print("Setoran tunai sebesar",nominal,"ke rekening",rek.upper(),"berhasil\n")
            break
    else:
        print("Nomor rekening tidak terdaftar. Setoran tunai Gagal.")

    m1.close()
    m2.close()
    mainlagi()


def tf():
    print("\n*** TRANSFER ***")
    rek1 = input("Masukkan nomor rekening sumber : ")
    rek2 = input("Masukkan nomor rekening tujuan : ")
    nominal = input("Masukkan nominal yang akan ditransfer : ")
    tf = "TRF" + ''.join(random.choice(string.digits) for _ in range(3))

    m1 = open("Tugas Adzna Bank/Adzna.txt", "r+")
    m2 = open("Tugas Adzna Bank/Adzna.txt", "r+")
    m3 = open("Tugas Adzna Bank/AdznaTransfer.txt", "a+")

    for line in m1:
        if rek1 in line.lower():
                line = line.strip().split(",")
                line[2] = str(int(line[2]) - int(nominal))
                line = ",".join(line)

        if rek2 in line.lower():
                line = line.strip().split(",")
                line[2] = str(int(line[2]) + int(nominal))
                line = ",".join(line)
                m2.write(f"{line}\n")
                print("Transfer sebesar",nominal,"dari rekening",rek1.upper(),"ke rekening",rek2.upper(),"berhasil.\n")

        m3.write(f"{tf},{rek1.upper()},{rek2.upper()},{nominal}\n")

    m1.close()
    m2.close()
    m3.close()
    mainlagi()


def daftar_tf():
    cek = open("Tugas Adzna Bank/AdznaTransfer.txt", "a+")
    data = cek.read()
    print(data)
    cek.close()
    mainlagi()


def mainlagi():
    while True:
        try:
            nanya = input("Kembali ke Menu (y/n)? ")
            if nanya == 'y' or nanya == 'Y':
                main()
            elif nanya == 'n' or nanya == 'N':
                print("Terima kasih atas kunjungan Anda...")
                exit()
            else:
                print("Pilihan Anda salah, Ulangi.")


        except ValueError:
            print("Pilihan Anda salah, Ulangi.")

def main():
    menu()

main()
