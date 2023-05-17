package com.example.weatherbox;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.textfield.TextInputLayout;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class SearchActivity extends AppCompatActivity {
    EditText txtvalue,cod;
    Button btnfetch;
    ListView listview;
    TextInputLayout mainLayout;
    private TextView link_records;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_search);

        txtvalue = (EditText)findViewById(R.id.editText);
        cod = (EditText)findViewById(R.id.cod);
        btnfetch = (Button)findViewById(R.id.buttonfetch);
        listview = (ListView)findViewById(R.id.listView);
        mainLayout = (TextInputLayout) findViewById(R.id.layoutsearch);
        link_records=findViewById(R.id.link_records);


        btnfetch.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                getData();
            }
        });
        link_records.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(SearchActivity.this,LoginActivity.class));
            }
        });
    }
    private void getData() {

        String value = txtvalue.getText().toString().trim();
        String valueCod = cod.getText().toString().trim();

        if (value.equals("")) {
            Toast.makeText(this, "Introduceti data si ora", Toast.LENGTH_LONG).show();
            return;
        }

        if (valueCod.equals("")) {
            Toast.makeText(this, "Introduceti codul", Toast.LENGTH_LONG).show();
            return;
        }

        String url = config5.DATA_URL + txtvalue.getText().toString().trim();



        StringRequest stringRequest = new StringRequest(url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {


                showJSON(response);
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        //         Toast.makeText(MainActivity.this, error.getMessage().toString(), Toast.LENGTH_LONG).show();
                    }
                });

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
        InputMethodManager imm = (InputMethodManager)getSystemService(Context.INPUT_METHOD_SERVICE);
        imm.hideSoftInputFromWindow(mainLayout.getWindowToken(), 0);

    }

    private void showJSON(String response) {
        ArrayList<HashMap<String, String>> list = new ArrayList<HashMap<String, String>>();
        try {
            cod = (EditText)findViewById(R.id.cod);
            JSONObject jsonObject = new JSONObject(response);
            JSONArray result = jsonObject.getJSONArray(config5.JSON_ARRAY);

            String valueCod = cod.getText().toString().trim();
            for (int i = 0; i < result.length(); i++) {
                JSONObject jo = result.getJSONObject(i);
                String locatie = jo.getString(config5.KEY_LOCATIE);
                String umiditate = jo.getString(config5.KEY_UMIDITATE);
                String temperatura = jo.getString(config5.KEY_TEMPERATURA);
                String calitate_aer = jo.getString(config5.KEY_CALITATE);
                String UV = jo.getString(config5.KEY_UV);
                String presiune = jo.getString(config5.KEY_PRESIUNE);
                String precipitatii = jo.getString(config5.KEY_PRECIPITATII);
                String timp = jo.getString(config5.KEY_TIMP);
                String id = jo.getString(config5.KEY_ID);


                if(locatie.equals(valueCod)){

                    final HashMap<String, String> employees = new HashMap<>();

                    employees.put(config5.KEY_LOCATIE, locatie);
                    employees.put(config5.KEY_UMIDITATE, "Umiditate = "+umiditate);
                    employees.put(config5.KEY_TEMPERATURA, "Temperatura = "+temperatura);
                    employees.put(config5.KEY_CALITATE, "Calitatea aerului = "+calitate_aer);
                    employees.put(config5.KEY_UV, "Indicele UV = "+UV);
                    employees.put(config5.KEY_PRESIUNE, "Presiunea atmosferica = "+presiune);
                    employees.put(config5.KEY_PRECIPITATII, "Precipitatii = "+precipitatii);
                    employees.put(config5.KEY_TIMP, timp);
                    employees.put(config5.KEY_ID, id);

                    list.add(employees);

                }
                else{
                    Toast.makeText(this, "Cod incorect", Toast.LENGTH_LONG).show();
                }
            }


        } catch (JSONException e) {
            e.printStackTrace();
        }
        ListAdapter adapter = new SimpleAdapter(
                SearchActivity.this, list, R.layout.mylist_activity,
                new String[]{ config5.KEY_LOCATIE,config5.KEY_UMIDITATE, config5.KEY_TEMPERATURA,config5.KEY_CALITATE,config5.KEY_UV, config5.KEY_PRESIUNE,config5.KEY_PRECIPITATII, config5.KEY_TIMP,  config5.KEY_ID},
                new int[]{ R.id.locatie, R.id.umiditate, R.id.temperatura,  R.id.calitate_aer, R.id.UV, R.id.presiune, R.id.precipitatii, R.id.timp});

        listview.setAdapter(adapter);
        if(adapter.getCount()==0){
            Toast.makeText(this, "Introduceti data si ora in formatul cerut", Toast.LENGTH_LONG).show();
            return;
        }
    }
}