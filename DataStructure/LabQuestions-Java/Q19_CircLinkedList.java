import java.util.Scanner;
public class Q19_CircLinkedList {
    public static void main(String ar[]){
        Scanner read=new Scanner(System.in);
        CirculralLinkedList List=new CirculralLinkedList();
        System.out.println("Press 1 to insert \nPress 2 to Display");
        System.out.println("Press 3 to exit");
        outerLoop:
        while(true){
            System.out.println("\nEnter your choose");
            int cho=read.nextInt();
            switch(cho){
                case 1:
                    List.insert();
                    break;
                case 2:
                    List.display();
                    break;
                case 3:
                    break outerLoop;
                default:
                    System.out.println("Wrong input");

            }
        }
        read.close();
    }
}

class CirculralLinkedList{
    NODE first,head,temp,last;
    Scanner read=new Scanner(System.in);
    CirculralLinkedList(){
        first=head=temp=last=null;
    }
    void insert(){
        System.out.print("Enter the value to insert: ");
        int n=read.nextInt();
        head=new NODE(n);
        if(first==null){
            first=last=head;
        }else{
            last.next=head;
            head.next=first;
            last=head;
        }
    }
    void display(){
        if(first==null){
            System.out.println("No elements");
            return;
        }
        System.out.println("The values in Circular Linked List are: ");
        System.out.print(first.n+" ");
        temp=first.next;
        while(temp!=first){
            System.out.print(temp.n+" ");
            temp=temp.next;
        }
        System.out.println();
    }
}

class NODE{
    public NODE next=null;
    public int n;
    NODE(int n){
        this.n=n;
    }
}
