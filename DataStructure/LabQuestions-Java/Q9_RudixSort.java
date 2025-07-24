import java.util.Scanner;
import java.util.Arrays;
public class Q9_RudixSort {
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

        int sortedArray[] = rudixSort(array);

        System.out.println("Sorted Array: ");
        for (int i : sortedArray) {
            System.out.print(i + " ");
        }
        System.out.println();
    }
    static int[] rudixSort(int[] array) {
        int max = Arrays.stream(array).max().orElse(Integer.MAX_VALUE);
        for (int exp = 1; max / exp > 0; exp *= 10) {
            countingSort(array, exp);
        }
        return array;
    }
    static void countingSort(int[] array, int exp) {
        int n = array.length;
        int output[] = new int[n];
        int count[] = new int[10];
        Arrays.fill(count, 0);

        for (int i = 0; i < n; i++) {
            count[(array[i] / exp) % 10]++;
        }

        for (int i = 1; i < 10; i++) {
            count[i] += count[i - 1];
        }

        for (int i = n - 1; i >= 0; i--) {
            output[count[(array[i] / exp) % 10] - 1] = array[i];
            count[(array[i] / exp) % 10]--;
        }

        System.arraycopy(output, 0, array, 0, n);
    }
}
