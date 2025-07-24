import java.util.Scanner;
public class Q13_Queue {
    public static void main(String ar[]){
        Scanner read=new Scanner(System.in);
        Queue queue=new Queue();
        System.out.println("Press 1 to insert \nPress 2 to delete");
        System.out.println("Press 3 to Peek to element \nPress 4 to Display all elements \nPress 5 to exit");
        outerLoop:
        while(true){
            System.out.println("\nEnter your choose");
            int cho=read.nextInt();
            switch(cho){
                case 1:
                    queue.insert();
                    break;
                case 2:
                    queue.delete();
                    break;
                case 3:
                    queue.peek();
                    break;
                case 4:
                    queue.display();
                    break;
                case 5:
                    break outerLoop;
                default:
                    System.out.println("Wrong input");

            }
        }
        read.close();
    }
}

class Queue{
    int front,rear;
    int queue[];
    int length;
    Scanner reader=new Scanner(System.in);
    Queue(){
        System.out.print("Enter the queue Size: ");
        length=reader.nextInt();
        queue=new int[length];
        front=rear=-1;
    }
    void insert(){
        if(rear+1==length){
            System.out.println("Queue is full");
            return;
        }
        if(rear==-1){
            front=rear=0;
        }else{
            rear++;
        }
        System.out.print("Enter the value to insert: ");
        queue[rear]=reader.nextInt();
    }
    void delete(){
        if(front==-1){
            System.out.println("Queue is empty");
            return;
        }
        int delete;
        if(front==rear){
            delete=queue[front];
            front=rear=-1;
        }else{
            delete=queue[rear];
            front++;
        }
        System.out.println("Deleted value is: "+delete);
    }

    void peek(){
        if(front==-1){
            System.out.println("Queue is empty");
            return;
        }
        System.out.println("Front value is: "+queue[front]);
    }

    void display(){
        if(front==-1){
            System.out.println("Queue is empty");
            return;
        }
        System.out.println("Queue values are: ");
        for(int i=front;i<=rear;i++){
            System.out.print(queue[i]+" ");
        }
        System.out.println();
    }
}
