#include <stdio.h>
#include <stdlib.h>

int main(){
	char c[1024];
        FILE *in;
        if( (in=fopen("flag","rt")) != NULL){
                fgets(c,1024,in);
        }else{
                exit(1);
        }
        fclose(in);
        printf("%s\n",c);
        return 0;
}