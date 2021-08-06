

let kk = "a shda a jskdh";
console.log(kk.match("a"));

function duplicateEncode(word)
{
  let arr = Array.from(word);
  
  let double;
  let i;
  let k = "";
  for(i = 0; i < arr.length; i++)
  {
      console.log(arr[i]);
    double = word.match(arr[i]);
    console.log(double);
    if(double.length > 1)
    {
      k = k + ")"; 
    }
    else
    {
      k = k + "(";
    }
  }
  
  return k;
}
