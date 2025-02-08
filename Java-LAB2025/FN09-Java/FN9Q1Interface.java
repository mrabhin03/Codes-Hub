public class FN9Q1Interface {
    public static void main(String ar[]){
        Circle cirObj=new Circle();
        cirObj.getDetails(2.4);
        System.out.println("The area of circle is : "+cirObj.findArea());

        Rectangle recObj=new Rectangle();
        recObj.getDetails(2.4,5.3);
        System.out.println("The area of Rectangle is : "+recObj.findArea());
    }
}


interface Shape{
    void getDetails();
    double findArea();
}

class Circle{
    double Radius;
    void getDetails(double Radius){
        this.Radius=Radius;
    }

    double findArea(){
        return Math.PI*(Radius*Radius);
    }
}

class Rectangle{
    double Lenght,Width;
    void getDetails(double Lenght,double Width){
        this.Lenght=Lenght;
        this.Width=Width;
    }

    double findArea(){
        return (Lenght*Width);
    }
}