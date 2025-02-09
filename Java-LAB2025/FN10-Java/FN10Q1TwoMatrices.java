import java.util.Scanner;

public class FN10Q1TwoMatrices {
    public static void main(String ar[]){
        Scanner read1=new Scanner(System.in);
        Scanner read2=new Scanner(System.in);

        int n,m,p,q;

        System.out.println("Enter the Row and column of the first matrix: ");
        n=read1.nextInt();
        m=read1.nextInt();
        int matx1[][]=new int[n][m];
        System.out.println("Enter Values of first matrix: ");
        for(int i=0;i<n;i++){
            for(int j=0;j<m;j++){
                matx1[i][j]=read2.nextInt();
            }
        }

        System.out.println("Enter the Row and column of the second matrix: ");
        p=read1.nextInt();
        q=read1.nextInt();
        if(m!=p){
            System.out.println("Column of first matrix and Row of Second matrix should be same");
        }else{
            int matx2[][]=new int[p][q];
            System.out.println("Enter Values of Second matrix: ");
            for(int i=0;i<p;i++){
                for(int j=0;j<q;j++){
                    matx2[i][j]=read2.nextInt();
                }
            }

            System.out.println("First Matrix: ");
            for(int i=0;i<n;i++){
                for(int j=0;j<m;j++){
                    System.out.print(matx1[i][j]+" ");
                }
                System.out.println("");
            }

            System.out.println("Second Matrix: ");
            for(int i=0;i<p;i++){
                for(int j=0;j<q;j++){
                    System.out.print(matx2[i][j]+" ");
                }
                System.out.println("");
            }

            System.out.println("Result Matrix: ");
            int result[][]=new int[n][q];
            for(int i=0;i<n;i++){
                for(int j=0;j<q;j++){
                    for(int k=0;k<m;k++){
                        result[i][j]+=matx1[i][k]*matx2[k][j];
                    }
                }
            }

            for(int i=0;i<n;i++){
                for(int j=0;j<q;j++){
                    System.out.print(result[i][j]+" ");
                }
                System.out.println("");
            }
        }
        read1.close();
        read2.close();

        
    }
}
