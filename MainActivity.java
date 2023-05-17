package com.example.weatherbox;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    private EditText nume, prenume, email, telefon, parola, cod;
    private Button btn_regist;
    private ProgressBar loading;
    private TextView link_login;
    private static String URL_REGIST="https://vremeata.ro/signup_android.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        loading=findViewById(R.id.loading);
        nume=findViewById(R.id.nume);
        prenume=findViewById(R.id.prenume);
        email=findViewById(R.id.email);
        telefon=findViewById(R.id.telefon);
        parola=findViewById(R.id.parola);
        cod=findViewById(R.id.cod);
        btn_regist=findViewById(R.id.btn_regist);
        link_login=findViewById(R.id.link_login);

        btn_regist.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v){
                Regist();
            }
        });
        link_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this,LoginActivity.class));
            }
        });
    }

    private void Regist(){
        loading.setVisibility(View.VISIBLE);
        btn_regist.setVisibility(View.GONE);

        final String nume= this.nume.getText().toString().trim();
        final String prenume= this.prenume.getText().toString().trim();
        final String email= this.email.getText().toString().trim();
        final String telefon= this.telefon.getText().toString().trim();
        final String parola= this.parola.getText().toString().trim();
        final String cod= this.cod.getText().toString().trim();

        StringRequest stringRequest=new StringRequest(Request.Method.POST, URL_REGIST,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        try{
                            JSONObject jsonObject=new JSONObject(response);
                            String success=jsonObject.getString("success");
                            JSONArray jsonArray = jsonObject.getJSONArray("login");

                            if (success.equals("1")) {
                                Toast.makeText(MainActivity.this, "V-ati inscris cu succes!", Toast.LENGTH_SHORT).show();

                                Intent intent = new Intent(MainActivity.this, LoginActivity.class);
                                startActivity(intent);
                                loading.setVisibility(View.GONE);
                                btn_regist.setVisibility(View.VISIBLE);
                            }

                        }catch (JSONException e){
                            e.printStackTrace();
                            Toast.makeText(MainActivity.this,"Eroare! Parola sau cod increcte.",Toast.LENGTH_SHORT).show();
                            loading.setVisibility(View.GONE);
                            btn_regist.setVisibility(View.VISIBLE);
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(MainActivity.this,"Eroare!"+error.toString(),Toast.LENGTH_SHORT);
                        loading.setVisibility(View.GONE);
                        btn_regist.setVisibility(View.VISIBLE);
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params=new HashMap<>();
                params.put("nume",nume);
                params.put("prenume",prenume);
                params.put("email",email);
                params.put("telefon",telefon);
                params.put("parola",parola);
                params.put("cod",cod);
                return params;
            }
        };

        RequestQueue requestQueue= Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }
}

