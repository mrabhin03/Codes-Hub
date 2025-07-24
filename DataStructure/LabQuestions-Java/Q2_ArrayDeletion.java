import java.util.Scanner;

public class Q2_ArrayDeletion {
    public static void main(String ar[]) {
        Scanner read = new Scanner(System.in);
        int n, pos;

        System.out.print("Enter the Array size: ");
        n = read.nextInt();
        int array[] = new int[n];

        System.out.println("Enter the elements: ");
        for (int i = 0; i < n; i++) {
            array[i] = read.nextInt();
        }

        System.out.print("Enter the position to delete: ");
        pos = read.nextInt();
        read.close();

        if (pos >= n || pos < 0) {
            System.out.println("Out of limit");
            return;
        }

        System.out.print("Array before deletion: ");
        for (int i = 0; i < n; i++) {
            System.out.print(array[i] + " ");
        }

        for (int i = pos - 1; i < n - 1; i++) {
            array[i] = array[i + 1];
        }

        System.out.println();
        System.out.print("Array after deletion: ");
        for (int i = 0; i < n - 1; i++) {
            System.out.print(array[i] + " ");
        }
    }
}