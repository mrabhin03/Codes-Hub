import java.util.Scanner;
public class Q4_BinarySearch {
    public static void main(String ar[]) {
        int n, key;
        Scanner read = new Scanner(System.in);
        System.out.print("Enter the Array size: ");
        n = read.nextInt();
        int array[] = new int[n];
        System.out.println("Enter the elements in sorted order: ");
        for (int i = 0; i < n; i++) {
            array[i] = read.nextInt();
        }
        System.out.print("Enter the element to search: ");
        key = read.nextInt();
        read.close();

        int left = 0, right = n - 1, mid;
        boolean found = false;
        

        while (left <= right) {
            mid = left + (right - left) / 2;
            if (array[mid] == key) {
                System.out.println("Element found at position: " + (mid + 1));
                found = true;
                break;
            } else if (array[mid] < key) {
                left = mid + 1;
            } else {
                right = mid - 1;
            }
        }

        if (!found) {
            System.out.println("Element not found in the array");
        }
    }
}
