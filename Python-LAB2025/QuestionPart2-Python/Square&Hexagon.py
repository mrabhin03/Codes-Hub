import turtle

t=turtle.Turtle()

t.penup()
t.backward(200)
t.pendown()

t.fillcolor("red")
t.begin_fill()
t.circle(60)
t.end_fill()

t.penup()

t.forward(150)
t.pendown()


t.fillcolor("yellow")
t.begin_fill()
for i in range(6):
    t.forward(80)
    t.left(60)
t.end_fill()
