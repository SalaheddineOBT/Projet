package com.example.myapplication

import android.app.AlertDialog
import android.content.ContextParams
import android.content.DialogInterface
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.os.Handler
import android.text.method.HideReturnsTransformationMethod
import android.text.method.PasswordTransformationMethod
import android.widget.*
import androidx.appcompat.widget.AppCompatButton
import androidx.core.widget.addTextChangedListener
import com.android.volley.AuthFailureError
import com.android.volley.Request
import com.android.volley.RequestQueue
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.Volley
import org.json.JSONObject

class LoginActivity : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

        val splashtimeout=6000
        val baseURL="https://rumbustious-hilltop.000webhostapp.com/API/Operations/Authentification/"
        val txtforgot:TextView=findViewById(R.id.btnfrgtpass)
        val token:String=""
        val btnLogin:AppCompatButton=findViewById(R.id.btnLogIn)
        val showpass:ImageView=findViewById(R.id.showpss)
        var isshow=false
        val emailinput:EditText=findViewById(R.id.txtEmail)
        val passinput:EditText=findViewById(R.id.txtPass)
        val txtSignup:TextView=findViewById(R.id.txtSignup)
        val linearpass:RelativeLayout=findViewById(R.id.lnrpass)
        val lineareml:RelativeLayout=findViewById(R.id.lnremal)

        val loadingDialog= LoadingDialog(this@LoginActivity)
        
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
                val params=HashMap<String,String>()
                params["email"]=email
                params["password"]=password
                val jO= JSONObject(params as Map<*, *>)
                val rq: RequestQueue = Volley.newRequestQueue(this@LoginActivity)
                val jor= JsonObjectRequest(Request.Method.POST,baseURL+"Login.php",jO, Response.Listener { res->
                    //alert("hello",""+res.toString())
                    try {
                        if(res.getString("success").equals("1")){

                            var token=res.getString("token")

                            loadingDialog.sartloadingAlert()
                            emailinput.text.clear()
                            passinput.text.clear()
                            email=""
                            password=""

                        } else { alert("Message d'Erreur !",res.getString("message")) }

                    }catch (e:Exception){
                        alert("Message d'Erreur !",""+e.message)
                    }
                },Response.ErrorListener { err->
                    alert("Message d'Erreur !",""+err.message)
                })
                rq.add(jor)

                /*val intent:Intent= Intent(this@LoginActivity,MainActivity::class.java)
                intent.putExtra("UserName","hello")
                startActivity(intent)
                finish()*/

                Handler().postDelayed({

                    val intent=Intent(this@LoginActivity,MainActivity::class.java)
                    //intent.putExtra("UserName",res.getString("user"))
                    startActivity(intent)
                    loadingDialog.dimissDialog()
                    finish()
                },splashtimeout.toLong())


            }else{ alert("Message d'Erreur !","Fill All Required Fields !") }
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
    private fun alert(title:String,message:String){
        val builder= AlertDialog.Builder(this@LoginActivity)
        builder.setTitle(title)
        builder.setMessage(message)
        builder.setPositiveButton("Ok",{ dialogInterface: DialogInterface, i: Int -> }).create()
        builder.show()
    }
}