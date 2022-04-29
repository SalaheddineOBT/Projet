package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.appcompat.widget.*

class GetStartedActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_get_started)

        val btnlog:AppCompatButton=findViewById(R.id.btnLog)
        val btncrAcc:AppCompatButton=findViewById(R.id.btncrAcc)

        btncrAcc.setOnClickListener{startActivity(Intent(this@GetStartedActivity,RegisterActivity::class.java))}
        btnlog.setOnClickListener{startActivity(Intent(this@GetStartedActivity,LoginActivity::class.java))}

    }
}