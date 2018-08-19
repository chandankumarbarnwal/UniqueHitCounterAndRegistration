#include <stdio.h>


int main()
{
    double a = 10.4;
    float a1=10.4; // local variables always win when there is a conflict between local and global.
	if(a1<a)
    {
    	printf("Yes\n");
    }
    else
    {
    	printf("no");
    }
}
