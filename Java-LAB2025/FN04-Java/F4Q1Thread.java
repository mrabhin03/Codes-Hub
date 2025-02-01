
// ---Thread using runnable interface

class T1 implements Runnable {
    public void run(){
        System.out.println("Thread Started: ");
        for(int i=1;i<=10;i++){
            System.out.println("i : "+i);
        }
        System.out.println("Thread End");
    }
}
public class F4Q1Thread {
    public static void main(String ar[]){
        T1 obj=new T1();
        Thread threadobj=new Thread(obj);
        threadobj.start();
    }
}
