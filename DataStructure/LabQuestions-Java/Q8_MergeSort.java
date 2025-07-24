import java.util.Scanner;
import java.util.Arrays;
public class Q8_MergeSort {
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

        int sortedArray[]=mergeSort(array);

        System.out.println("Sorted Array: ");
        for (int i : sortedArray) {
            System.out.print(i + " ");
        }
        System.out.println();
    }

    public static int[]  mergeSort(int[] array){
        if(array.length<2){
            return array;
        }
        int left[]=mergeSort(Arrays.copyOfRange(array,0,array.length/2));
        int right[]=mergeSort(Arrays.copyOfRange(array,array.length/2,array.length));
        return merge(left,right);
    }

    public static int[] merge(int[] left,int[] right){
        int i=0,k=0,j=0;
        int newArray[]=new int[left.length+right.length];
        while(i<left.length && j<right.length){
            if(left[i]<right[j]){
                newArray[k]=left[i];
                k++;
                i++;
            }else{
                newArray[k]=right[j];
                k++;
                j++;
            }
        }
        while(i<left.length){
            newArray[k]=left[i];
            k++;
            i++;
        }
        while(j<right.length){
            newArray[k]=right[j];
            k++;
            j++;
        }
        return newArray;
    }
}
