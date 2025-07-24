import java.util.Scanner;
public class Q1_ArrayInsertion {
    public static void main(String ar[]){
        int n;
        Scanner read=new Scanner(System.in); 
        System.out.print("Enter the Array size: ");
        n=read.nextInt();
        int arr[]=new int[n];
        for(int i=0;i<n;i++){
            arr[i]=read.nextInt();
        }
        System.out.print("The Array elements are: ");
        for(int i=0;i<n;i++){
            System.out.print(arr[i]+", ");
        }
        read.close();
    }
}
