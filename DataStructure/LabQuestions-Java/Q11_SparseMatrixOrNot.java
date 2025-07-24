import java.util.Scanner;
public class Q11_SparseMatrixOrNot {
    public static void main(String ar[]){
        Scanner read=new Scanner(System.in);
        int m,n;
        System.out.print("Enter the row Size: ");
        m=read.nextInt();
        System.out.print("Enter the column Size: ");
        n=read.nextInt();
        int matrix[][]=new int[m][n];
        System.out.println("Enter the Matrix Value: ");
        for(int i=0;i<m;i++){
            for(int j=0;j<n;j++){
                matrix[i][j]=read.nextInt();
            }
        }

        System.out.println("The Matrix: ");
        int zeroCount=0;
        for(int i=0;i<m;i++){
            for(int j=0;j<n;j++){
                System.out.print(String.format("%3d",matrix[i][j]));
                if(matrix[i][j]==0){
                    zeroCount++;
                }
            }
            System.out.println();
        }
        if(zeroCount>=((m*n)/2)){
            System.out.println("Is a Sparse Matrix");
        }else{
            System.out.println("Not a Sparse Matrix");
        }
        read.close();
    }    
}
