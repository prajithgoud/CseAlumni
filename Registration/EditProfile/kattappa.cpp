#include <bits/stdc++.h> 
using namespace std; 
typedef long long int ll;

long long int countPartitions(int n, int k) 
{ 
  
      
    long long int dp[201][201]; 
  
    for (int i = 0; i < n + 1; i++) { 
        for (int j = 0; j < n + 1; j++) { 
            dp[i][j] = -1; 
        } 
    } 
  
    if (dp[n][k] >= 0) 
        return dp[n][k]; 
  
    if (n < k) 
        return 0; 
  
    if (n < 2 * k) 
        return 1; 
  
    long long int answer = 1; 
  
    // for loop to iterate over K to N 
    // and find number of 
    // possible valid partitions recursively. 
    for (int i = k; i < n; i++) 
        answer = answer + countPartitions(n - i, i); 
  
    // memoization is done by storing 
    // this calculated answer 
    dp[n][k] = answer; 
  
    // returning number of valid partitions 
    return answer; 
} 
  
// Driver code 
int main() 
{ 
    ll t ;
    cin>>t ;
    while(t--)
    {
    ll n , k ; 
    cin>>n>>k ;
    // Printing total number of valid partitions 
    cout<< countPartitions(n, k)<<endl ; 
  
     
} }