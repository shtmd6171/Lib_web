package sec03.exam01;

/* for문을 이용하여 *로 모래시계 모양을 출력하는 프로그램
 * 글로벌 소프트웨어학과 2017315024 임윤지
 * 2020/07/22*/
import java.util.*;

public class test {

   public static void main(String[] args) {
      Scanner sc = new Scanner(System.in);
      System.out.print("삼각형의 높이를 설정해 주세요. : ");
      int hight = sc.nextInt();
      // 역 삼각형 출력
      for (int a = hight; a > 0; a--) {
         for (int b = hight; b > a; b--) {
            System.out.print(" ");
         }
         for (int c = 2 * a - 1; c > 0; c--) {
            System.out.print("*");
         }
         System.out.println();
      }

      // 정삼각형 출력
      for (int i = 1; i <= hight; i++) {
         for (int j = 1; j <= hight - i; j++) {
            System.out.print(" ");
         }
         // 홀수 출력 공식 이용
         for (int k = 1; k <= i * 2 - 1; k++) {
            System.out.print("*");
         }
         System.out.println();
      }
   }

} 