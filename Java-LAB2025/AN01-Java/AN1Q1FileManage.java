import java.io.*;
import java.util.Scanner;
public class AN1Q1FileManage {
    public static void main(String ar[]){
        try{
            Scanner read=new Scanner(System.in);
            System.out.print("Enter the File name to Create: ");
            String fileName=read.nextLine();
            File Thefile=new File(fileName);
            if(Thefile.createNewFile()){
                System.out.println("File Created: ");
            }else{
                System.out.println("File Already exist: ");
            }


            FileWriter fileWriter=new FileWriter(fileName);
            System.out.print("Enter Enter the value to insert to file: ");
            String info=read.nextLine();
            fileWriter.write(info);
            fileWriter.close();

            Scanner FileValue=new Scanner(Thefile);
            System.out.println("The Data in "+fileName+" : ");
            while(FileValue.hasNextLine()){
                System.out.println(FileValue.nextLine());
            }
            FileValue.close();

            System.out.println("Press 1 to delete the file: ");
            int option=read.nextInt();
            if(option==1){
                System.out.println("File DELETED");
                Thefile.delete();
            }
            

        }catch(Exception e){
            System.out.println("Something went wrong");
        }
    }
}
