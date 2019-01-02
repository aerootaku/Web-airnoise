
#include <SoftwareSerial.h>

int buzzerPin = 2;
void setup() {
  // put your setup code here, to run once:
  //serial begin ESP
  Serial.begin(115200);
  Serial.println("AT+CWMODE=1");
  delay(1000);
  Serial.println("AT+CWJAP=\"YOUR_WIFI_SSID\",\"YOUR_WIFI_PASSWORD\""); //change this line according to your wifi username and password
  delay(1000);
  pinMode(buzzerPin, OUTPUT);
  digitalWrite(buzzerPin, HIGH);
}

void loop() {
      int MQT = MQ();
      int n = noise();
      delay(1000);
      Serial.println("AT+CIPSTART=\"TCP\",\"192.168.8.101\",80"); //change the IP address according to the IP of your laptop.
      delay(1000);
      Serial.println("AT+CIPSEND=77");
      delay(1000);
      Serial.print("GET /noise/api.php?mq=");
      Serial.print(MQT);
      Serial.print("&noise=");
      Serial.println(n);
      delay(3000);
      Serial.println("AT+CIPCLOSE");


      if(MQT > 450){
         digitalWrite(buzzerPin, LOW);
         delay(5000);
         digitalWrite(buzzerPin, HIGH);
      }
      else {
        digitalWrite(buzzerPin, HIGH);
      }

}

int MQ(){
  int MQ = analogRead(A0);

  return MQ;
}

int noise(){

  int ns = analogRead(A1);

  return ns;
}
