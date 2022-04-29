package com.example.myapplication

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.fragment.app.Fragment
import com.google.android.material.bottomnavigation.BottomNavigationView

class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        loadFragement(HomeFragment())

        val navigationbr=findViewById<BottomNavigationView>(R.id.navigationbr)
        navigationbr.setOnNavigationItemSelectedListener{item ->
            when{
                item.itemId==R.id.home -> {
                    loadFragement(HomeFragment())
                    return@setOnNavigationItemSelectedListener true
                }
                item.itemId==R.id.cars -> {
                    loadFragement(CarsFragment())
                    return@setOnNavigationItemSelectedListener true
                }
                item.itemId==R.id.profil -> {
                    loadFragement(AccountFragment())
                    return@setOnNavigationItemSelectedListener true
                }
                else -> {
                    //loadFragement(HomeFragment())
                    return@setOnNavigationItemSelectedListener false
                }
            }
        }

    }

    private fun loadFragement(fragment:Fragment){
        supportFragmentManager.beginTransaction().also { fragmentTransaction ->
            fragmentTransaction.replace(R.id.framgment,fragment)
            fragmentTransaction.commit()
        }
    }

}
