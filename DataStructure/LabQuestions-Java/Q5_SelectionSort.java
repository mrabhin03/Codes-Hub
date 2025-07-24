import java.util.Scanner;
public class Q5_SelectionSort {
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

        for (int i = 0; i < n - 1; i++) {
            int minIndex = i;
            for (int j = i + 1; j < n; j++) {
                if (array[j] < array[minIndex]) {
                    minIndex = j;
                }
            }
            int temp = array[minIndex];
            array[minIndex] = array[i];
            array[i] = temp;
        }

        System.out.println("Sorted Array: ");
        for (int i : array) {
            System.out.print(i + " ");
        }
        System.out.println();
    }
}
