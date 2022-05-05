package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.text.method.HideReturnsTransformationMethod
import android.text.method.PasswordTransformationMethod
import android.widget.*
import androidx.appcompat.widget.AppCompatButton
import androidx.core.widget.addTextChangedListener

class LoginActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

        val txtforgot:TextView=findViewById(R.id.btnfrgtpass)
        val btnLogin:AppCompatButton=findViewById(R.id.btnLogIn)
        val showpass:ImageView=findViewById(R.id.showpss)
        var isshow=false
        val emailinput:EditText=findViewById(R.id.txtEmail)
        val passinput:EditText=findViewById(R.id.txtPass)
        val txtSignup:TextView=findViewById(R.id.txtSignup)
        val linearpass:RelativeLayout=findViewById(R.id.lnrpass)
        val lineareml:RelativeLayout=findViewById(R.id.lnremal)

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
        txtSignup.setOnClickListener {
            startActivity(Intent(this@LoginActivity,RegisterActivity::class.java))
            finish()
        }
        emailinput.addTextChangedListener{ value -> formvalidate(value.toString(),emailinput,lineareml) }
        passinput.addTextChangedListener{ value -> formvalidate(value.toString(),passinput,linearpass) }
        btnLogin.setOnClickListener{
            var email:String=emailinput.text.toString()
            var password:String=passinput.text.toString()
            formvalidate(email,emailinput,lineareml)
            formvalidate(password,passinput,linearpass)

            if(!password.isNullOrEmpty() && !email.isNullOrEmpty()){
                val intent:Intent= Intent(this@LoginActivity,MainActivity::class.java)
                intent.putExtra("UserName","hello")
                startActivity(intent)
                finish()
            }else{

            }
        }

    }
    private fun formvalidate(value:String,txt:EditText,lnr:RelativeLayout){
        if(value.isNullOrEmpty()){
            lnr.background=getDrawable(R.drawable.errorborder)
            //txt.setHintTextColor(getResources().getColor(R.color.red))
        }
        else{
            lnr.background=getDrawable(R.drawable.input_border)
            //txt.setHintTextColor(getResources().getColor(R.color.red))
        }
    }
}