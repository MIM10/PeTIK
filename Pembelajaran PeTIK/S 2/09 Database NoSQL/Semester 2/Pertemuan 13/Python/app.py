# melakukan proses import pymongo
import pymongo

# membuat config koneksi untuk menghubungkan mongodb dengan python
koneksi_url = "mongodb://localhost:27017"

# membuat sebuah function yang bertugas untuk mengecek koneksi ke mongodb
def cekMongoDB() :
    client = pymongo.MongoClient(koneksi_url)
    try:
        cek = client.list_database_names()
        print(cek)
    except:
        print("database tidak terhubung")

# membuat sebuah function yang bertugas untuk create database
def createDatabase() :
    dbClient = pymongo.MongoClient(koneksi_url)
    namaDatabase = dbClient['Database_Mahasantri_New']
    namaCollection = namaDatabase['Angkatan_Pertama']
    value_data = namaCollection.insert_one({ 'nama':"Feirdaus", 'jurusan': "PPL" })
    print("berhasil menambahkan data")
    print(value_data)

class MongoCRUD:
    def __init__(self, data, koneksi):
        self.client = pymongo.MongoClient(koneksi)
        database = data['database']
        collection = data['collection']
        cursor = self.client[database]
        self.collection = cursor[collection]
        self.data = data

    #=========== fungsi untuk read/membaca data =============#

    def readData(self):
        documents = self.collection.find()
        value = [{
            item: data[item] for item in data if item != '_id'} for data in documents]
        return value

if __name__ == '__main__' :
    data = {
        "database" : "Database_Mahasantri_New",
        "collection" : "Angkatan_Pertama",

        "dataAwal" : {
            "nama" : "Aslan",
            "jurusan" : "PPL"
        }
    }

    mongo_objek = MongoCRUD(data, koneksi_url)  
    read = mongo_objek.readData()
    print(read)