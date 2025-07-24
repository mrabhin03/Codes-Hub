import java.util.Scanner;
public class Q3_LinearSearch {
    public static void main(String ar[]){
        int n, key;
        Scanner read = new Scanner(System.in);
        System.out.print("Enter the Array size: ");
        n = read.nextInt();
        int array[] = new int[n];
        System.out.println("Enter the elements: ");
        for(int i = 0; i < n; i++){
            array[i] = read.nextInt();
        }
        
        System.out.print("Enter the element to search: ");
        key = read.nextInt();
        read.close();
        for(int i = 0; i < n; i++){
            if(array[i] == key){
                System.out.println("Element found at position: " + (i + 1));
                return;
            }
        }
        System.out.println("Element not found in the array");
    }
}
