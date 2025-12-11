def binary_Search(lis,l,h,ele):
    if l>h:
        return -1
    
    mid=(h+l)//2
    if lis[mid]==ele:
        return mid
    elif ele>lis[mid]:
        return binary_Search(lis,mid+1,h,ele)
    else:
        return binary_Search(lis,l,mid-1,ele)

n=int(input("Enter the list size: "))

lis=[]
for i in range(n):
    lis.append(int(input(f"Enter the value{i+1}: ")))

num=int(input("Enter the number to search: "))
index=binary_Search(lis,0,len(lis)-1,num)
if index==-1:
    print("The element not found")
else:
    print("The element found at the index:",index)
