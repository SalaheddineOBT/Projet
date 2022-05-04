package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.text.method.HideReturnsTransformationMethod
import android.text.method.PasswordTransformationMethod
import android.widget.*
import androidx.appcompat.widget.AppCompatButton

class LoginActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

        val txtforgot:TextView=findViewById(R.id.btnfrgtpass)
        val btnLogin:AppCompatButton
        val showpass:ImageView=findViewById(R.id.showpss)
        var isshow=false
        val emailinput:EditText=findViewById(R.id.txtEmail)
        val passinput:EditText=findViewById(R.id.txtPass)
        val txtSignup:TextView=findViewById(R.id.txtSignup)

        showpass.setOnClickListener{
            if(isshow != true){
                isshow=true
                showpass.setBackgroundResource(R.drawable.hidepassword)
                passinput.transformationMethod= HideReturnsTransformationMethod.getInstance()
            }else{
                isshow=false
                showpass.setBackgroundResource(R.drawable.showpassword)
                passinput.transformationMethod= PasswordTransformationMethod.getInstance()
            }
        }

        txtSignup.setOnClickListener { startActivity(Intent(this@LoginActivity,RegisterActivity::class.java)) }

    }
}