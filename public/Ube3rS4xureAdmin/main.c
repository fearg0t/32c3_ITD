#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <time.h>

int main(int argc,char *argv[]){
	srand(time(NULL));

	int result = 0;
	int i;
	if(argc<=1){
		printf("LOOSE");
		exit(1);
	}
	char *p=argv[1];
	char c[33];
	FILE *in;
	if( (in=fopen("Xqefkm.txt","rt")) != NULL){
		fgets(c,33,in);
	}else{
                printf("LOOSE");
		exit(1);
        }
        fclose(in);
	printf("%s\n",c);
        for(i=0;i < 32;i++){
                result |= p[i] ^ c[i];
        }
	// Time wasting fu :D
	int r = ( rand() %  1000000) + 1000000;
        sleep(0+rand()%2);
        if(result ==0)
                printf("WIN");
        else
                printf("LOOSE");
        return 0;
}