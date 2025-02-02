
// ---Thread using Thread Class

class T1 extends Thread {
    public void run(){
        System.out.println("Thread Started: ");
        for(int i=1;i<=10;i++){
            System.out.println("i : "+i);
        }
        System.out.println("Thread End");
    }
}
public class FN4Q1Thread {
    public static void main(String ar[]){
        T1 threadobj=new T1();
        threadobj.start();
    }
}
