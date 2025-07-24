import java.util.Scanner;
public class Q20_DoublyLinkedList {
    public static void main(String ar[]){
        Scanner read=new Scanner(System.in);
        DoublyLinkedList List=new DoublyLinkedList();
        System.out.println("Press 1 to insert at beginning \nPress 2 to insert at end");
        System.out.println("Press 3 to Display \nPress 4 to exit");
        outerLoop:
        while(true){
            System.out.println("\nEnter your choose");
            int cho=read.nextInt();
            switch(cho){
                case 1:
                    List.insertAtBegin();
                    break;
                case 2:
                    List.insertAtEnd();
                    break;
                case 3:
                    List.display();
                    break;
                case 4:
                    break outerLoop;
                default:
                    System.out.println("Wrong input");

            }
        }
        read.close();
    }
}

class DoublyLinkedList{
    NODE first,head,temp,last;
    Scanner read=new Scanner(System.in);
    DoublyLinkedList(){
        first=head=temp=last=null;
    }
    void insertAtBegin(){
        System.out.print("Enter the value to insert: ");
        int n=read.nextInt();
        head=new NODE(n);
        if(first==null){
            first=last=head;
        }else{
            first.prev=head;
            head.next=first;
            first=head;
        }
    }
    void insertAtEnd(){
        System.out.print("Enter the value to insert: ");
        int n=read.nextInt();
        head=new NODE(n);
        if(first==null){
            first=last=head;
        }else{
            last.next=head;
            head.prev=last;
            last=head;
        }
    }
    void display(){
        if(first==null){
            System.out.println("No elements");
            return;
        }
        System.out.println("The values in Linked List are: ");
        temp=first;
        while(temp!=null){
            System.out.print(temp.n+" ");
            temp=temp.next;
        }
        System.out.println();
    }
}

class NODE{
    public NODE next=null,prev=null;
    public int n;
    NODE(int n){
        this.n=n;
    }
}
