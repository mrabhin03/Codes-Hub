import java.util.Scanner;
public class Q6_InsertionSort {
    public static void main(String[] args) {
        int n;
        Scanner read = new Scanner(System.in);
        System.out.print("Enter the Array size: ");
        n = read.nextInt();
        int array[] = new int[n];
        System.out.println("Enter the elements: ");
        for (int i = 0; i < n; i++) {
            array[i] = read.nextInt();
        }
        read.close();

        for (int i = 1; i < n; i++) {
            int key = array[i];
            int j = i - 1;

            while (j >= 0 && array[j] > key) {
                array[j + 1] = array[j];
                j--;
            }
            array[j + 1] = key;
        }

        System.out.println("Sorted Array: ");
        for (int i : array) {
            System.out.print(i + " ");
        }
        System.out.println();
    }
}
