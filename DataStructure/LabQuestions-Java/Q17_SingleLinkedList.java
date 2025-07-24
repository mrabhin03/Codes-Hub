import java.util.Scanner;
public class Q17_SingleLinkedList {
    public static void main(String ar[]){
        Scanner read=new Scanner(System.in);
        SingleLinkedList List=new SingleLinkedList();
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

class SingleLinkedList{
    NODE first,head,temp;
    Scanner read=new Scanner(System.in);
    SingleLinkedList(){
        first=head=temp=null;
    }
    void insert(){
        System.out.print("Enter the value to insert: ");
        int n=read.nextInt();
        head=new NODE(n);
        if(first==null){
            first=head;
        }else{
            temp=first;
            while(temp.next!=null){
                temp=temp.next;
            }
            temp.next=head;
        }
    }
    void display(){
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
    public NODE next=null;
    public int n;
    NODE(int n){
        this.n=n;
    }
}
