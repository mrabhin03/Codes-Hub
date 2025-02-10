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
   
    double findArea();
}

class Circle implements Shape{
    double Radius;
    void getDetails(double Radius){
        this.Radius=Radius;
    }

    public double findArea(){
        return Math.PI*(Radius*Radius);
    }
}

class Rectangle implements Shape{
    double Lenght,Width;
    void getDetails(double Lenght,double Width){
        this.Lenght=Lenght;
        this.Width=Width;
    }

    public double findArea(){
        return (Lenght*Width);
    }
}