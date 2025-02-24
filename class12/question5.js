function outerFunction(outerVariable) {
    return function innerFunction(innerVariable) {
        console.log(`Outer Variable: ${outerVariable}, Inner Variable: ${innerVariable}`);
    };
}

const newFunction = outerFunction("Hello");
newFunction("World");  //outer variable: Hello, inner variable: World
