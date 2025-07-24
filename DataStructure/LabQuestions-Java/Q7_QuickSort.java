import java.util.Scanner;
public class Q7_QuickSort {
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

        quickSort(array, 0, n - 1);

        System.out.println("Sorted Array: ");
        for (int i : array) {
            System.out.print(i + " ");
        }
        System.out.println();
    }
    public static void quickSort(int[] array, int low, int high) {
        if (low < high) {
            int pi = partition(array, low, high);
            quickSort(array, low, pi - 1);
            quickSort(array, pi + 1, high);
        }
    }
    public static int partition(int[] array, int low, int high) {
        int pivot = array[high];
        int i = (low - 1);
        for (int j = low; j < high; j++) {
            if (array[j] < pivot) {
                i++;
                int temp = array[i];
                array[i] = array[j];
                array[j] = temp;
            }
        }
        int temp = array[i + 1];
        array[i + 1] = array[high];
        array[high] = temp;
        return i + 1;
    }
}
