import java.io.*;
import java.util.Scanner;
public class FN6Q1FileManage {
    public static void main(String ar[]){
        try{


            Scanner read=new Scanner(System.in);
            System.out.print("Enter the File name to Create: ");
            String fileName=read.nextLine();
            File Thefile=new File(fileName);
            if(Thefile.createNewFile()){ // Creating File
                System.out.println("File Created: ");
            }else{
                System.out.println("File Already exist: ");
            }


            FileWriter fileWriter=new FileWriter(fileName);
            System.out.print("Enter the value to insert to file: ");
            String info=read.nextLine();
            fileWriter.write(info); // Writing to file
            fileWriter.close();


            Scanner FileValue=new Scanner(Thefile);
            System.out.println("The Data in "+fileName+" : ");
            while(FileValue.hasNextLine()){
                System.out.println(FileValue.nextLine()); // Reading from file
            }
            FileValue.close();


            System.out.println("Press 1 to delete the file: ");
            int option=read.nextInt();
            if(option==1){
                if(Thefile.delete()){ // Deleting file
                    System.out.println("File DELETED");
                }else{
                    System.out.println("File not DELETED");
                }
            }
            read.close();

            
        }catch(Exception e){
            System.out.println("Something went wrong");
        }
    }
}
