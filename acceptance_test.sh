#!/bin/bash
test $(curl localhost:3200/sum?a=1\&b=2) -eq 3