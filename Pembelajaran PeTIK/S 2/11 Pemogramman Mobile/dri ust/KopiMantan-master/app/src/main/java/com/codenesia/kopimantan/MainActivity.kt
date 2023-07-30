package com.codenesia.kopimantan

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.text.Editable
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import com.codenesia.kopimantan.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity() {

    private lateinit var binding: ActivityMainBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)

        setContentView(binding.root)

        supportActionBar?.hide()

        /* Inisialisasi Variabel */
        val nama = binding.etNama
        val pesanan = binding.etPesanan
        var totalPesanan = binding.tvTotal
        var btnPesan = binding.btnPesan

        /* Harga KopiMantan */
        var kopiMantan = 15000

        /* Action */
        btnPesan.setOnClickListener { jumlahPesanan(nama.text.toString(), pesanan.text.toString(), kopiMantan) }

    }

    private fun jumlahPesanan(nama: String, pesanan: String , kopiMantan: Int) {
            var total = pesanan.toInt() * kopiMantan
            binding.tvTotal.text = total.toString()
    }

}