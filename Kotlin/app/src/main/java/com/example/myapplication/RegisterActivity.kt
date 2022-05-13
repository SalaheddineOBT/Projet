package com.example.myapplication

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.text.method.HideReturnsTransformationMethod
import android.text.method.PasswordTransformationMethod
import android.widget.*
import androidx.appcompat.widget.AppCompatButton
import androidx.core.widget.addTextChangedListener

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
        val lnrname:RelativeLayout=findViewById(R.id.lnrname)
        val lnremml:RelativeLayout=findViewById(R.id.lnremml)
        val lnrphn:RelativeLayout=findViewById(R.id.lnrphn)
        val lnrpss:RelativeLayout=findViewById(R.id.lnrpss)
        val lnrcfrm:RelativeLayout=findViewById(R.id.lnrcfrm)
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
        txtSignin.setOnClickListener {
            startActivity(Intent(this@RegisterActivity,LoginActivity::class.java))
            finish()
        }
        txtName.addTextChangedListener{ value -> formvalidate(value.toString(),txtName,lnrname) }
        txtEmail.addTextChangedListener{ value -> formvalidate(value.toString(),txtEmail,lnremml) }
        txtPass.addTextChangedListener{ value -> formvalidate(value.toString(),txtPass,lnrpss) }
        txtPhone.addTextChangedListener{ value -> formvalidate(value.toString(),txtPhone,lnrphn) }
        txtConfirm.addTextChangedListener{ value -> formvalidate(value.toString(),txtConfirm,lnrcfrm) }
        btnRegister.setOnClickListener{
            var fullname:String=txtName.text.toString()
            var email:String=txtEmail.text.toString()
            var phone:String=txtPhone.text.toString()
            var password:String=txtPass.text.toString()
            var confirm:String=txtConfirm.text.toString()
            formvalidate(fullname,txtName,lnrname)
            formvalidate(email,txtEmail,lnremml)
            formvalidate(phone,txtPhone,lnrphn)
            formvalidate(password,txtPass,lnrpss)
            formvalidate(confirm,txtConfirm,lnrcfrm)

            if(!fullname.isNullOrEmpty() && !email.isNullOrEmpty() && !phone.isNullOrEmpty() && !password.isNullOrEmpty() && !confirm.isNullOrEmpty()){
                if(password == confirm){



                /*val intent:Intent= Intent(this@RegisterActivity,MainActivity::class.java)
                    intent.putExtra("UserName","hello")
                    startActivity(intent)
                    finish()*/
                }else{

                }
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