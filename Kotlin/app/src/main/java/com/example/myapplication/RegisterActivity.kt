package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.text.method.HideReturnsTransformationMethod
import android.text.method.PasswordTransformationMethod
import android.widget.*
import androidx.appcompat.widget.AppCompatButton

class RegisterActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)

        val txtName:EditText=findViewById(R.id.txtName)
        val txtEmail:EditText=findViewById(R.id.txtEmailR)
        val txtPhone:EditText=findViewById(R.id.txtPhone)
        val txtPass:EditText=findViewById(R.id.txtPassR)
        val showpss:ImageView=findViewById(R.id.showpssR)
        val showConfirmpss:ImageView=findViewById(R.id.showconfirmpss)
        val txtConfirm:EditText=findViewById(R.id.txtConfirm)
        val btnRegister:AppCompatButton=findViewById(R.id.btnRegister)
        val txtSignin:TextView=findViewById(R.id.txtSignin)
        var isshow1=false
        var isshow2=false

        showpss.setOnClickListener{
            if(isshow1 != true){
                isshow1=true
                showpss.setBackgroundResource(R.drawable.hidepassword)
                txtPass.transformationMethod= HideReturnsTransformationMethod.getInstance()
            }else{
                isshow1=false
                showpss.setBackgroundResource(R.drawable.showpassword)
                txtPass.transformationMethod= PasswordTransformationMethod.getInstance()
            }
        }

        showConfirmpss.setOnClickListener{
            if(isshow2 != true){
                isshow2=true
                showConfirmpss.setBackgroundResource(R.drawable.hidepassword)
                txtConfirm.transformationMethod= HideReturnsTransformationMethod.getInstance()
            }else{
                isshow2=false
                showConfirmpss.setBackgroundResource(R.drawable.showpassword)
                txtConfirm.transformationMethod= PasswordTransformationMethod.getInstance()
            }
        }

        txtSignin.setOnClickListener { finish() }




    }
}