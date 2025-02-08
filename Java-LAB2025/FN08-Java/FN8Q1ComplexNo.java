
public class FN8Q1ComplexNo {
    public static void main(String ar[]){
        Complex obj1=new Complex(2.4,5.3);
        Complex obj2=new Complex(1.6,4.7);
        Complex result=obj1.addValues(obj2);
        result.displayValues();

    }
}


class Complex{
    double real,imaginary;
    Complex(double real,double imaginary){
        this.real=real;
        this.imaginary=imaginary;
    }
    void displayValues(){
        System.out.println("Real Number: "+real);
        System.out.println("Imaginary Number: "+imaginary);
    }
    Complex addValues(Complex obj){
        double Treal=this.real+obj.real;
        double Timag=this.imaginary+obj.imaginary;
        return new Complex(Treal,Timag);
    }
}